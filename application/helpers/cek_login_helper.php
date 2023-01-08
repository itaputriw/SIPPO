<?php
function cek_login()
{
    $ci = get_instance(); //untuk memanggil helper ci ke function helper
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    }
    $id_role = $ci->session->userdata('role');
    $url = $ci->uri->segment(1);
    $queryMenu = $ci->db->get_where('tbl_user_menu', ['uri' => $url])->row_array();

    $menu_id = $queryMenu['id_menu'];

    $userAkses = $ci->db->get_where('tbl_user_akses_menu', [
        'id_role' => $id_role,
        'id_menu' => $menu_id
    ]);

    if ($userAkses->num_rows() < 1) {
        redirect('auth/blocked');
    }
}

function cek_akses($id_role, $id_menu)
{
    $ci = get_instance();

    $ci->db->where('id_role',  $id_role);
    $ci->db->where('id_menu',  $id_menu);
    $result = $ci->db->get('tbl_user_akses_menu');

    if ($result->num_rows() > 0) {
        return "checked ='checked'";
    }
}
