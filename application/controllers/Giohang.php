<?php
class Giohang extends MY_Controller
{
    public function them()
    {
        $msp = $this->input->post('msp');
        $sl = $this->input->post('sluong');
        $san_pham =$this->m_san_pham_table->san_pham_id($msp);
        $dgBan = $san_pham['dongia']-$san_pham['dongiakhuyenmai'];
        $mang_tt = array(
            'id'=>$msp,
            'qty'=>$sl,
            'price'=>$dgBan,
            'name'=>$san_pham['tensanpham']
        );
        $this->cart->insert($mang_tt);
        
        echo json_encode(array('tt'=>$this->cart->total(),'tsl'=>$this->cart->total_items()));
    }
    public function thongtingiohang()
    {
        if($this->input->post('btnSubmit')!="")
        {
            if($this->cart->contents())
            {
                $ttGiohang = $this->cart->contents();
                $mang_cap_nhat = array();
                foreach($ttGiohang as $item)
                {
                    $sl_moi =$this->input->post($item['rowid']);
                    if($sl_moi>=0 && $sl_moi!=$item['qty'])
                    $mang_cap_nhat[]=array('rowid'=>$item['rowid'],'qty'=>$sl_moi);
                }
                if($mang_cap_nhat)
                    $this->cart->update($mang_cap_nhat);
            }
        }
        $this->data['title_bar'] = 'Thông Tin Giỏ Hàng';
        $this->data['gio_hang'] =$this->cart->contents();
        $this->data['path'] = array('san_pham/v_thong_tin_gio_hang');
        $this->load->view('san_pham/layoutsp',$this->data);
        
     }
}
?>