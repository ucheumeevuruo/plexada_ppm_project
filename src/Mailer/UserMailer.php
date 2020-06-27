<?php
namespace App\Mailer; 
use Cake\Mailer\Mailer;    
class UserMailer extends Mailer
{
public function registered($user)
{
// attach a text file 
$this->attachments([
// attach an image file 
'edit.png'=>[
'file'=>'files/beneficiary.png',
'mimetype'=>'image/png',
'contentId'=>'734h3r38'
]
])
->to($user->email) // add email recipient
->emailFormat('html') // email format
->subject(sprintf('Welcome %s', $user->name)) //  subject of email
->viewVars([   // these variables will be passed to email template defined in step 5 with 
//name registered.ctp
'username'=> $user->name,
'useremail'=>$user->email
])
// the template file you will use in this email
->template('registered') // By default template with same name as method name is used.
// the layout  'default.ctp’ file you will use in this email
->layout('default'); //optional field
// ->layout(default); //optional field
}}