<?php
class zone_admin_18 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_18');
    }
    public function index()
    {
        // $data['email'] = $this->db->get_whare();
        $session['a'] = $this->session->userdata();
        // $id['a'] = $this->session->userdata('id_user');
        $id_peran = 1;
        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        $query = "SELECT `id_menu` FROM `trx_menu` WHERE `id_peran` = $id_peran";
        $id_menus = $this->db->query($query)->result();

        // $peran = $_SESSION['id_peran'];
        $querymenu = "SELECT * FROM `trx_menu` INNER JOIN `menu` ON `trx_menu`.`id_menu` = `menu`.`id_menu` WHERE `trx_menu`.`id_peran` = $id_peran";
        $menu = $this->db->query($querymenu)->result_array();

        var_dump($menu);
        die;

        // $array_id[] = $this->db->query($query)->result();
        // $query_menu = "SELECT `nama_menu`, `url`, `icon` FROM `menu` WHERE `id_menu` = $id_menu";
        // $menu = $this->db->query($query_menu)->result();
        // foreach ($array_id as $id) {
        //     echo $id;
        // }
        // $customer = mysqli_query($conn, "SELECT * FROM data WHERE username = '$ya'");
        // $doto = mysqli_num_rows($query);
        // while ($urutan = mysqli_fetch_array($query) {
        //     $url  = $urutan['url'];
        //     $namamenu  = $urutan['nama_menu'];
        //     $icon  = $urutan['icon'];
        // }




        $query_menu = "SELECT `nama_menu`, `url`, `icon` FROM `menu` WHERE `id_menu` = $id_menus";
        // $daftarMenu = $this->db->query($query_menu)->result();

        // foreach ($id_menus as $id_menu) {
        // }


        $data['menus'] = $this->db->get('menu')->result_array();


        // $ambilIdMenu = $this->Admin_18->ambil_id_menu($id_peran);
        // $arrayIdMenu = array(
        //     'id_menu' => $ambilIdMenu->id_menu
        // );

        // $ambilDataMenu = $this->Admin_18->ambil_data_menu($arrayIdMenu['id_menu']);
        // var_dump($data);
        // die;



        $this->load->view('admin/Nav/header2');
        $this->load->view('admin/Nav/sidebar', $data);
        $this->load->view('login/view_admin_18');
        $this->load->view('admin/Nav/footer');
        // var_dump($session['a']);
        // die;
    }
}
