<?php
defined('_JEXEC') or die;
jimport('joomla.application.component.controllerform');

class NewspapersControllerNewspapers extends JControllerForm
{
    public function insert()
    {
        $mainframe = JFactory::getApplication();

        $db = JFactory::getDbo();

        try {

            //Valida Campos

            //ID
            if (!isset($_POST['id']) || empty($_POST['id'])) {
                JFactory::getApplication()->enqueueMessage('Evento Inválido', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }
            //Nome
            if (!isset($_POST['name']) || empty($_POST['name'])) {
                JFactory::getApplication()->enqueueMessage('Nome Inválido', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }

            //E-mail
            if (!isset($_POST['email']) || empty($_POST['email'])) {
                JFactory::getApplication()->enqueueMessage('E-mail Inválido', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }
            //CPF
            if (!isset($_POST['cpf']) || empty($_POST['cpf'])) {
                JFactory::getApplication()->enqueueMessage('CPF Inválido', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }
            //RG
            if (!isset($_POST['rg']) || empty($_POST['rg'])) {
                JFactory::getApplication()->enqueueMessage('Documento de Identidade Inválido', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }
            //Data Nascimento
            if (!isset($_POST['date_birth']) || empty($_POST['date_birth'])) {
                JFactory::getApplication()->enqueueMessage('Data de Nascimento Inválida', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }
            //Escolaridade
            if (!isset($_POST['schooling']) || empty($_POST['schooling'])) {
                JFactory::getApplication()->enqueueMessage('Escolaridade Inválida', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }
            //Sexo
            if (!isset($_POST['gender']) || empty($_POST['gender'])) {
                JFactory::getApplication()->enqueueMessage('Sexo Inválido', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }
            //Endereço
            if (!isset($_POST['address']) || empty($_POST['address'])) {
                JFactory::getApplication()->enqueueMessage('Endereço Inválido', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }
            //Número
            if (!isset($_POST['number']) || empty($_POST['number'])) {
                JFactory::getApplication()->enqueueMessage('Número Inválido', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }
            //Bairro
            if (!isset($_POST['district']) || empty($_POST['district'])) {
                JFactory::getApplication()->enqueueMessage('Bairro Inválido', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }
            //Cidade
            if (!isset($_POST['city']) || empty($_POST['city'])) {
                JFactory::getApplication()->enqueueMessage('Cidade Inválida', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }
            //Estado
            if (!isset($_POST['state']) || empty($_POST['state'])) {
                JFactory::getApplication()->enqueueMessage('Estado Inválido', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }
            //CEP
            if (!isset($_POST['postal_code']) || empty($_POST['postal_code'])) {
                JFactory::getApplication()->enqueueMessage('CEP Inválido', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }
            //Telefone
            if (!isset($_POST['phone']) || empty($_POST['phone'])) {
                JFactory::getApplication()->enqueueMessage('Telefone Inválido', 'error');
                $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever'));
                return false;
            }

            $id = ($_POST['id']);
            $name = trim($_POST['name']);
            $alias = JFilterOutput::stringURLSafe(trim($_POST['name'])) . '-' . $id;
            $email = trim($_POST['email']);
            $cpf = trim($_POST['cpf']);
            $rg = trim($_POST['rg']);
            $date_birth = explode('/', trim($_POST['date_birth']));
            $date_birth = $date_birth[2] . '-' . $date_birth[1] . '-' . $date_birth[0];
            $gender = trim($_POST['gender']);
            $schooling = trim($_POST['schooling']);
            $address = trim($_POST['address']);
            $number = trim($_POST['number']);
            $complement = trim($_POST['complement']);
            $district = trim($_POST['district']);
            $state = trim($_POST['state']);
            $city = trim($_POST['city']);
            $postal_code = trim($_POST['postal_code']);
            $phone = trim($_POST['phone']);

            $date = JFactory::getDate('now', new DateTimeZone('America/Sao_Paulo'));

            $query = $db->getQuery(true);

            $columns = array(
                'id_newspaper',
                'name',
                'alias',
                'cpf',
                'email',
                'rg',
                'date_birth',
                'gender',
                'schooling',
                'address',
                'number',
                'complement',
                'district',
                'city',
                'state',
                'postal_code',
                'phone',
                'published',
                'created'
            );

            // Insert values.
            $values = array(
                $db->quote($id),
                $db->quote($name),
                $db->quote($alias),
                $db->quote($cpf),
                $db->quote($email),
                $db->quote($rg),
                $db->quote($date_birth),
                $db->quote($gender),
                $db->quote($schooling),
                $db->quote($address),
                $db->quote($number),
                $db->quote($complement),
                $db->quote($district),
                $db->quote($city),
                $db->quote($state),
                $db->quote($postal_code),
                $db->quote($phone),
                $db->quote(1),
                $db->quote($date)
            );

            // Prepare the insert query.
            $query
                ->insert($db->quoteName('#__newspaper_subscribe'))
                ->columns($db->quoteName($columns))
                ->values(implode(',', $values));

            // Set the query using our newly populated query object and execute it.
            $db->setQuery($query);

            $result = $db->execute();


        } catch (Exception $e) {
            // catch any database errors.
            JErrorPage::render($e);
        }

        PHP_email::email_confirma_contrato($_POST);

        JFactory::getApplication()->enqueueMessage('Inscrição realizada com sucesso', 'success');
        $mainframe->redirect(JRoute::_('index.php?option=com_newspapers&view=inscrever&id=' . $id));

    }
}

class PHP_email extends PHPMailer
{

    public static function email_confirma_contrato($dataForm)
    {

        $menu =& JSite::getMenu();
        $item = $menu->getActive();

        $user = JFactory::getUser($item->query['id_user_mail']);
        $email = $user->get('email');//user email

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__newspapers');
        $query->where('id = ' . $dataForm['id']);
        $db->setQuery($query);
        $newspaper = $db->loadObjectList();

        $app = JFactory::getApplication();
        $mailfrom = $email;
        $fromname = 'Evento AMDA';
        $sitename = $app->getCfg('sitename');

        $mail = JFactory::getMailer();
        $mail->addRecipient(array($mailfrom));
        $mail->setSender(array($mailfrom, $fromname));
        $mail->IsHTML();
        $mail->setSubject("Inscrito no Evento");
        $mail->setBody(
            '<html>'
            . '<body>'
            . '<p>Inscrito no jornal: ' . $newspaper[0]->name . ' com sucesso.</p>'
            . '<p>Nome: ' . $dataForm["name"] . '</p>'
            . '<p>E-mail: ' . $dataForm["email"] . '</p>'
            . '<p>CPF: ' . $dataForm["cpf"] . '</p>'
            . '<p>Identidade(RG): ' . $dataForm["rg"] . '</p>'
            . '<p>Telefone: ' . $dataForm["phone"] . '</p>'
            . '<p>Data de Nascimento: ' . $dataForm["date_birth"] . '</p>'
            . '<p>Sexo: ' . $dataForm["gender"] . '</p>'
            . '<p>Escolaridade: ' . $dataForm["schooling"] . '</p>'
            . '<p>Endereço: ' . $dataForm["address"] . '</p>'
            . '<p>Número: ' . $dataForm["number"] . '</p>'
            . '<p>Complemento: ' . $dataForm["complement"] . '</p>'
            . '<p>Bairro: ' . $dataForm["district"] . '</p>'
            . '<p>Cidade: ' . $dataForm["city"] . '</p>'
            . '<p>Estado: ' . $dataForm["state"] . '</p>'
            . '<p>CEP: ' . $dataForm["postal_code"] . '</p>'
            . '</body>'
            . '</html>');

        $sent = $mail->Send();

        //Email de confirmação inscrição

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__newspapers');
        $query->where('id = ' . $dataForm['id']);
        $db->setQuery($query);
        $newspaper = $db->loadObjectList();

        $mail = JFactory::getMailer();
        $mail->addRecipient(array($dataForm['email']));
        $mail->setSender(array($mailfrom, $fromname));
        $mail->IsHTML();
        $mail->setSubject("Inscrição Evento");
        $mail->setBody(
            '<html>'
            . '<body>'
            . '<p>Inscrição no jornal: ' . $newspaper[0]->name . ' com sucesso.</p>'
            . '<p>Aguardamos sua presença.</p>'
            . 'Att.: ' . $sitename
            . '</body>'
            . '</html>');

        $sent = $mail->Send();
    }

}