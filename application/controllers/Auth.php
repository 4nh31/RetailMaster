<?php
class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->library('session');
        date_default_timezone_set('America/Cancun');

    }

    // Método para mostrar el formulario de recuperación
    public function forgot_password() {
        // Verifica si se ha enviado el formulario
        if ($this->input->post()) {
            $email = $this->input->post('email');
            
            // Verifica si el correo existe en la base de datos
            $user = $this->User_model->get_user_by_email($email);
            
            if ($user) {
                // Generar un token único para el usuario
                $token = bin2hex(random_bytes(50));
                $this->User_model->save_password_reset_token($user->id_usuario, $token);

                // Enviar correo electrónico con el enlace de restablecimiento de contraseña
                $this->send_recovery_email($email, $token);
                
                // Redirigir con un mensaje de éxito
                $this->session->set_flashdata('message', 'Te hemos enviado un enlace para restablecer tu contraseña.');
                redirect('auth/forgot_password');
            } else {
                // Si el correo no existe, mostrar un error
                $data['error'] = 'No encontramos un usuario con ese correo electrónico.';
                $this->load->view('retail/forgot_password', $data);
            }
        } else {
            $this->load->view('retail/forgot_password');
        }
    }

    // Método para enviar el correo con el token
    private function send_recovery_email($email, $token) {
        $this->email->from('tu_correo@gmail.com', 'RETAILMASTER');
        $this->email->to($email);
        $this->email->subject('Recuperación de Contraseña');
    
        // El enlace para el restablecimiento de la contraseña
        $reset_url = site_url('auth/reset_password?token=' . urlencode($token));    
        $message = "Haga clic en el siguiente enlace para restablecer su contraseña: <a href='" . $reset_url . "'>Restablecer contraseña</a>";
    
        $this->email->message($message);
    
        if ($this->email->send()) {
            return true;
        } else {
            log_message('error', 'No se pudo enviar el correo de recuperación de contraseña. Error: ' . $this->email->print_debugger());
            return false;
        }
    }
    

    // Método para restablecer la contraseña
    public function reset_password() {
        $token = $this->input->get('token');
        
        if ($this->User_model->is_valid_token($token)) {
            // Mostrar formulario para cambiar la contraseña
            $this->load->view('retail/reset_password', ['token' => $token]);
        } else {
            echo 'Token no válido o expirado';
        }
    }

    public function update_password() {
        $token = $this->input->post('token');
        $new_password = $this->input->post('password');
        
        // Validar el token
        if ($this->User_model->is_valid_token($token)) {
            // Actualizar la contraseña en la base de datos
            $this->User_model->update_password($token, $new_password);
    
            // Configurar un mensaje flash para mostrar en el login
            $this->session->set_flashdata('success', 'Tu contraseña ha sido actualizada exitosamente. Por favor, inicia sesión.');
    
            // Redirigir al login
            redirect('retailmaster/index'); 
        } else {
            // Si el token es inválido o ha expirado
            $this->session->set_flashdata('error', 'Token no válido o expirado.');
            redirect('auth/reset_password'); 
        }
    }    
}
?>
