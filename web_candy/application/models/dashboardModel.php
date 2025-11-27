<?php
class dashboardModel extends CI_Model
{
    public function getOrders()
    {
        $this->db->select('order.*, users.username, users.email, users.contact, users.shipping_address, product.productName, order.OrderDate, order.OrderStatus');
        $this->db->from('order');
        $this->db->join('users', 'users.id = order.UserId', 'left');
        $this->db->join('product', 'product.id = order.ProductId', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    public function toggleOrderStatus($order_id)
    {
        $order = $this->db->get_where('order', array('id' => $order_id))->row();
        if ($order) {
            $new_status = ($order->OrderStatus == 'Confirm') ? 'Delivered' : 'Confirm';
            $this->db->where('id', $order_id);
            $this->db->update('order', array('OrderStatus' => $new_status));
            return true;
        }
        return false;
    }
    public function deleteOrder($id){
        $this->db->where('id', $id);
        $this->db->delete('order');
    }
}
?>