<?=$this->load->view($template.'/elements/page_inner_title',array('subpage_name'=>$page_name))?>
<?php pr($items)?>
<?=$this->load->view($template.'/modules/healthcare/m_home_healthcare',array('items'=>$items))?>
