<?php
/**
 * Created by PhpStorm.
 * User: snowsem
 * Date: 28.01.2016
 * Time: 17:03
 */
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Request;
use PhpImap;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;


use Illuminate\Http\Response;
ini_set("memory_limit","1000M");
set_time_limit(1000);
class MailController extends Controller {

    public function index() {


        $mailbox = new PhpImap\Mailbox('{imap.yandex.ru:993/imap/ssl}INBOX', '@ya.ru', '');

        $mailsIds = $mailbox->sortMails();
        $check = $mailbox->checkMailbox();
        var_dump($check);

        //$mailsIds = $mailbox->searchMailbox('ALL');

       //$mailbox->getListingFolders();
        if(!$mailsIds) {
            die('Mailbox is empty');
        }

// Get the first message and save its attachment(s) to disk:
        //var_dump($mailsIds);
        $mails = array();
        $countM = $mailbox->countMails();
        foreach($mailsIds as $id) {
            //print $id;
            $mails[] = $mailbox->getMail($id);
            //echo $mail->subject;
            //echo $mail->textPlain;
            //echo $mail->textHtml;

            //var_dump($mail);
            //echo '<br>';
            //echo "\n\n\n\n\n";
            //var_dump($mail->getAttachments());


        }
        return view('mailViews.index', ['mails'=>$mails, 'countMails'=>$countM, 'check'=>$check]);


    }
    public function readMessage($id) {
        //print $id;
        $mailbox = new PhpImap\Mailbox('{imap.yandex.ru:993/imap/ssl}INBOX', '@ya.ru', '', __DIR__);
        $mail = $mailbox->getMail($id);

        //var_dump($mail->getAttachments());
        return view('mailViews.read', ['mail'=>$mail]);



    }
    public function renderMessage($id) {
        //print $id;
        $mailbox = new PhpImap\Mailbox('{imap.yandex.ru:993/imap/ssl}INBOX', '@ya.ru', '');
        $mail = $mailbox->getMail($id);
        //var_dump($mail);
        print $mail->textHtml;
        print $mail->textPlain;



    }


}