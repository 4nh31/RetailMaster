<?php
class User_model extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->database(); // Carga la base de datos
    }
    // Obtener usuario por correo
    public function get_user_by_email($email) {
        $query = $this->db->get_where('login', ['correo' => $email]);
        return $query->row();
    }

    // Guardar token de recuperación de contraseña
    public function save_password_reset_token($user_id, $token) {
        $data = [
            'reset_token' => $token,
            'token_expiration' => date('Y-m-d H:i:s', strtotime('+1 hour'))
        ];
        
        $this->db->where('id_usuario', $user_id);
        $this->db->update('login', $data);
    }
    

    // Verificar si el token es válido
    public function is_valid_token($token) {
        $this->db->where('reset_token', $token);
        $this->db->where('token_expiration >', date('Y-m-d H:i:s'));
        $query = $this->db->get('login');
        return $query->row(); // Devuelve el usuario si el token es válido y no ha expirado
    }
    

    // Actualizar la contraseña
    public function update_password($token, $new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $this->db->update('login', ['password' => $hashed_password, 'reset_token' => null], ['reset_token' => $token]);
    }
}

?>