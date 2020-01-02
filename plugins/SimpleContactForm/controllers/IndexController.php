<?php
/**
 * @copyright Roy Rosenzweig Center for History and New Media, 2007-2014
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @package SimpleContactForm
 */

/**
 * Controller for Contact form.
 *
 * @package SimpleContactForm
 */
class SimpleContactForm_IndexController extends Omeka_Controller_AbstractActionController
{
    public function indexAction()
    {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $organisation = isset($_POST['organisation']) ? $_POST['organisation'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $workshop = isset($_POST['workshop']) ? $_POST['workshop'] : '';
        $reserve = isset($_POST['reserve']) ? $_POST['reserve'] : '';
        $attest = isset($_POST['attest']) ? $_POST['attest'] : '';

        $captchaObj = $this->_setupCaptcha();

        if ($this->getRequest()->isPost()) {
            // If the form submission is valid, then send out the email
            if ($this->_validateFormSubmission($captchaObj)) {
                $this->sendEmailNotification($_POST['email'], $_POST['firstname'].' '.$_POST['name'], $_POST);
                $this->_helper->redirector->goToRoute(array(), 'simple_contact_form_thankyou');
            }
        }

        // Render the HTML for the captcha itself.
        // Pass this a blank Zend_View b/c ZF forces it.
        if ($captchaObj) {
            $captcha = $captchaObj->render(new Zend_View);
        } else {
            $captcha = '';
        }

        $this->view->assign(compact('name','firstname','organisation','tel','address','email','workshop','reserve','attest','captcha'));
    }

    public function thankyouAction()
    {
    }

    protected function _validateFormSubmission($captcha = null)
    {
        $valid = true;
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $organisation = isset($_POST['organisation']) ? $_POST['organisation'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $workshop = isset($_POST['workshop']) ? $_POST['workshop'] : '';
        $reserve = isset($_POST['reserve']) ? $_POST['reserve'] : '';
        $attest = isset($_POST['attest']) ? $_POST['attest'] : '';

        $msg = $this->getRequest()->getPost('message');
        $email = $this->getRequest()->getPost('email');
        // ZF ReCaptcha ignores the 1st arg.
        if ($captcha and !$captcha->isValid('foo', $_POST)) {
            $this->_helper->flashMessenger(__('Your CAPTCHA submission was invalid, please try again.'));
            $valid = false;
        } else if (empty($name)) {
            $this->_helper->flashMessenger(__('Je bent je naam vergeten.'));
            $valid = false;
        } else if (empty($firstname)) {
            $this->_helper->flashMessenger(__('Je bent je voornaam vergeten.'));
            $valid = false;
        } else if (empty($organisation)) {
            $this->_helper->flashMessenger(__('Je bent je organisatie vergeten.'));
            $valid = false;
        } else if (empty($address)) {
            $this->_helper->flashMessenger(__('Gelieve een adres in te vullen.'));
            $valid = false;
        } else if (empty($tel)) {
            $this->_helper->flashMessenger(__('Gelieve een telefoonnummer in te vullen.'));
            $valid = false;
        } else if (!Zend_Validate::is($email, 'EmailAddress')) {
            $this->_helper->flashMessenger(__('Je hebt geen geldig e-mailadres opgegeven.'));
            $valid = false;
        }/* else if ($workshop == '') {
          $this->_helper->flashMessenger(__('Je hebt geen sessies geselecteerd.'));
          $valid = false;
        }else if(sizeof($workshop) != 2){

          $this->_helper->flashMessenger(__('Gelieve 2 sessies te selecteren.'));
          $valid = false;
        }  else if (empty($reserve)) {
            $this->_helper->flashMessenger(__('Gelieve een reservekeuze te maken.'));
            $valid = false;
        }*/

        return $valid;
    }

    protected function _setupCaptcha()
    {
        return Omeka_Captcha::getCaptcha();
    }

    protected function sendEmailNotification($formEmail, $formName, $post)
    {
        //notify the admin
        //use the admin email specified in the plugin configuration.
        $forwardToEmail = get_option('simple_contact_form_forward_to_email');
        $formMessage =
          "<strong>Naam</strong><br />".$formName."<br />".
          "<strong>Organisatie</strong><br />".$post['organisation']."<br />".
          "<strong>Adres</strong><br />".$post['address']."<br />".
          "<strong>Telefoonnummer</strong><br />".$post['tel']."<br />".
          "<strong>E-mailadres</strong><br />".$post['email']."<br />";
          /*"<strong>Workshops</strong><br />".implode(', ',$post['workshop'])."<br />";
          "<strong>Reservekeuze</strong><br />".$post['reserve']."<br />";
          "<strong>Attest</strong><br />".$post['attest'];*/

        if (!empty($forwardToEmail)) {
            $mail = new Zend_Mail('UTF-8');
            $mail->setBodyHtml($formMessage);
            $mail->setFrom($formEmail, $formName);
            $mail->addTo($forwardToEmail);
            $mail->setSubject(get_option('site_title') . ' - ' . __('Inschrijving studiedag'));
            $mail->send();
        }

        $organisation = isset($post['organisation']) ? $post['organisation'] : '';
        $address = isset($post['address']) ? $post['address'] : '';
        $tel = isset($post['tel']) ? $post['tel'] : '';
        $email = isset($post['email']) ? $post['email'] : '';
        $workshop = isset($post['workshop']) ? $post['workshop'] : '';
        $reserve = isset($post['reserve']) ? $post['reserve'] : '';
        $attest = isset($post['attest']) ? $post['attest'] : '';

        $cvsData = "\n" . $formName . "," .
          $organisation . ",\"" .
          $address . "\"," .
          $tel . "," .
          $email . ",\"" .
          implode(', ',$workshop) . "\"," .
          $reserve . "," .
          $attest;

        $fp = fopen(SIMPLE_CONTACT_FORM_DIR."/files/results.csv","a"); // $fp is now the file pointer to file $filename

            if($fp)
            {
                fwrite($fp,$cvsData); // Write information to the file
                fclose($fp); // Close the file
            }

    }
}
