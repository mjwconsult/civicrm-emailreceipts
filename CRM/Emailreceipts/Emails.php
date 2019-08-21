<?php

/**
 * https://civicrm.org/licensing
 */

/**
 * Class CRM_Emailreceipts_Emails
 */
class CRM_Emailreceipts_Emails {

  public static function alterAndCreateActivity(&$params) {

    if ($params['messageTemplateID']) {
      $messageTemplate = $params['messageTemplateID'];
    }
    else {
      $messageTemplate = "{$params['groupName']}.{$params['valueName']}";
    }

    $details = $messageTemplate;
    $details .= '<br /><label>From: </label>' . htmlentities($params['from']);
    $details .= '<br /><label>To: </label>' . htmlentities(CRM_Utils_Mail::formatRFC822Email(CRM_Utils_Array::value('toName', $params), CRM_Utils_Array::value('toEmail', $params)));
    $details .= '<br /><label>HTML version: </label>' . trim(CRM_Utils_Array::value('html', $params));
    $details .= '<br /><label>Text version: </label>' . CRM_Utils_Array::value('text', $params);
    foreach (CRM_Utils_Array::value('attachments', $params) as $attachment) {
      $details .= '<br /><label>Attachment: </label>' . print_r($attachment, TRUE);
    }
    $subject = CRM_Utils_Array::value('subject', $params);

    $activityParams = [
      'activity_type_id' => "Email",
      'subject' => $subject,
      'details' => $details,
      'status_id' => "Completed",
      'source_contact_id' => $params['contactId'],
    ];

    if (!empty($params['contributionId'])) {
      $activityParams['source_record_id'] = $params['contributionId'];
    }

    // Do we want to block email sending?
    if (in_array(CRM_Utils_Array::value('valueName', $params), self::getReceiptMessageTemplates())) {
      $params['abortMailSend'] = (boolean) CRM_Emailreceipts_Settings::getValue('block');
      $activityParams['status_id'] = 'Cancelled';
    }
    civicrm_api3('Activity', 'create', $activityParams);
  }

  private static function getReceiptMessageTemplates() {
    $templates = [
      'membership_online_receipt',
      'membership_offline_receipt',
      'contribution_online_receipt',
      'contribution_offline_receipt',
      'event_online_receipt',
      'event_offline_receipt',
      'payment_or_refund_notification',
      'contribution_recurring_notify',
    ];
    return $templates;
  }

}
