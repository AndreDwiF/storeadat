<?php

function sudah_login()
{
    $ci= get_instance();
    $ci->load->model('PetugasModel');
    if(!$ci->session->userdata('nama_petugas'))
		{
			redirect('welcome');
		}
        else{
            $role_id= $ci->session->userdata('role_id');
            $menu= $ci->uri->segment(1);

            $queryMenu = $ci->db->get_where('menu',['menu'=>$menu])->row_array();
            $menu_id = $queryMenu['id'];

            $userAccess = $ci->db->get_where('accessmenu',[
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]);

            if($userAccess->num_rows() < 1)
            {
                redirect('auth/blocked');
            }
            

        }
}