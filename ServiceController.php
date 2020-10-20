<?php
App::uses('AppController', 'Controller');

class ServiceController extends AppController
{

  public $pattern = '/<p(.*?)><span(.*?)\"><strong>KHAI GIẢNG KH&Oacute;A NH&Agrave;(.*?)TẠO MẪU T&Oacute;C(.*?)<\/strong><\/span><\/p>/';
  public $replacement = '<p dir="ltr"><span style="color:#fff17e"><strong>KHAI GIẢNG KHÓA NHÀ TẠO MẪU TÓC TIẾP THEO VÀO NGÀY 10/11/2020 TẠI TPHCM.</strong></span></p>';

    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    public function admin_index(){
        $allService = $this->Service->getService();
        parent::checkUserLogin();
        $this->set(compact('allService'));
        $this->render();
    }

    public function admin_createservice(){
        if ($this->request->isPost()) {
            $data['Service']['title'] = $this->data['Service']['title'];
            $data['Service']['alias'] = Util::setAlias($this->data['Service']['title']);
            $data['Service']['image'] = $this->data['Service']['thumbnail'];
            $data['Service']['thumbnail'] = parent::getUploadThumbnail($data['Service']['image'], Configure::read('THUMBNAILS'), $data['Service']['title']);
            unset($data['Service']['image']);
            $this->Service->set($data);
            if ($this->Service->save()) {
                $this->Session->setFlash(__('Uploaded', true), 'default', array('class' => 'SuccessMessage'));
                $this->redirect(array('controller' => 'service', 'action' => 'index', 'alias' => $alias, 'admin' => true));
            }
            $this->Session->setFlash(__('Error, can not upload', true), 'default', array('class' => 'ErrorMessage'));
        }
    }

    public function admin_addimage(){
        $id = isset($this->params['named']['id']) ? abs($this->params['named']['id']) : '';
        debug($id);
    }

    public function admin_editservice(){
        if ($this->request->isPost()) {
            $id = isset($this->params['named']['id']) ? abs($this->params['named']['id']) : '';
            $data['Service']['title'] = $this->data['Service']['title'];
            $data['Service']['alias'] = Util::setAlias($this->data['Service']['title']);
            $data['Service']['content'] = Util::setNiceDescription($this->data['Service']['content']);
            $data['Service']['image'] = $this->data['Service']['thumbnail'];
            $data['Service']['sort'] = $this->data['Service']['sort'];
            $data['Service']['is_published'] = $this->data['Service']['is_published'];
            $data['Service']['is_homepage'] = $this->data['Service']['is_homepage'];
            if($data['Service']['image']['name']!=''){
                $data['Service']['thumbnail'] = parent::getUploadThumbnail($data['Service']['image'], Configure::read('THUMBNAILS'), $data['Service']['title']);
                unset($data['Service']['image']);
            }

            $this->Service->id = $id;
            $this->Service->set($data);
            if ($this->Service->save()) {
                $this->Session->setFlash(__('Updated', true), 'default', array('class' => 'SuccessMessage'));
                $this->redirect(array('controller' => 'service', 'action' => 'index', 'alias' => $alias, 'admin' => true));
            }
            $this->Session->setFlash(__('Error, can not upload', true), 'default', array('class' => 'ErrorMessage'));
        }
        else{
        	print_r($this->params['named']);
        $id = isset($this->params['named']['id']) ? abs($this->params['named']['id']) : '';
        $serviceItem = $this->Service->getServiceItem($id);
        $this->set(compact('serviceItem'));



        $this->render();
        }
    }


    public function admin_deleteservice(){
        $this->layout = false;
        $id = isset($this->params['named']['id']) ? abs($this->params['named']['id']) : '';
        $this->Service->delete($id);
        $this->redirect(array('controller' => 'service', 'action' => 'index', 'admin' => true));
    }

    public function view_service(){
        $id = isset($this->params['id']) ? abs(intval($this->params['id'])) : 0;
        if ($id == 0) {
            $this->redirect('/');
        }
        $service = $this->Service->getServiceItem($id);
        $this->set(compact('service'));
        $this->render();
    }


    public function list_service_by_alias(){
		$page = ($this->params->page!='')?abs($this->params->page):0;
        $alias = isset($this->params['alias']) ? $this->params['alias'] : '';
        //debug($alias);exit;
        $labels = $this->Label->getLabelsIdBySlug($alias);
        if(sizeof($labels)<=0){
            $labelsId = '';
        }else{
            $labelsId = $labels[0]['Label']['id'];
        }

        $articleId = $this->ArticleLabel->getArticleIdByLabelId($labelsId);

        $arrayArticleId = array();
        foreach($articleId as $a_id){
            array_push($arrayArticleId,$a_id['ArticleLabel']['article_id']);
        }
        //$articles = $this->Article->getArticleByArrayId($arrayArticleId);
        $this->Session->write('arrayArticleId',$arrayArticleId);

		$this->paginate=array(
            'conditions'=>array(
                'Article.id' => $arrayArticleId,
                'Article.is_published' => 1,
            ),
            'order'=>'Article.sort DESC',
            'limit'=>10,
			'page'=>$page
        );
        $articles = $this->paginate('Article');
        foreach($articles as $key=>$value){

            $value['Article']['description'] = preg_replace($this->pattern,$this->replacement,$value['Article']['description']);

            $articles[$key] = $value;
        }

        $this->set(compact('articles'));
    }

    public function list_home_khuyenmai_by_alias(){
        $alias = $this->request->params['named']['alias'];
        //debug($alias);exit;
        $labels = $this->Label->getLabelsIdBySlug($alias);
        if(sizeof($labels)<=0){
            $labelsId = '';
        }else{
            $labelsId = $labels[0]['Label']['id'];
        }

        $articleId = $this->ArticleLabel->getArticleIdByLabelId($labelsId);

        $arrayArticleId = array();
        foreach($articleId as $a_id){
            array_push($arrayArticleId,$a_id['ArticleLabel']['article_id']);
        }
        $articles = $this->Article->getArticleByArrayId($arrayArticleId);
        return $articles;
    }

    public function list_home_sk_th_by_alias(){
        $alias = $this->request->params['named']['alias'];
        $labels = $this->Label->getLabelsIdBySlug($alias);
        if(sizeof($labels)<=0){
            $labelsId = '';
        }else{
            $labelsId = $labels[0]['Label']['id'];
        }

        $articleId = $this->ArticleLabel->getArticleIdByLabelId($labelsId);

        $arrayArticleId = array();
        foreach($articleId as $a_id){
            array_push($arrayArticleId,$a_id['ArticleLabel']['article_id']);
        }
        //$articles = $this->Article->getArticleByArrayId($arrayArticleId);

		$this->paginate=array(
            'conditions'=>array(
                'Article.id' => $arrayArticleId
            ),
            'order'=>'Article.sort DESC',
            'limit'=>10
        );
        $articles = $this->paginate('Article');

		foreach($articles as $key=>$value){

        $value['Article']['description'] = preg_replace($this->pattern,$this->replacement,$value['Article']['description']);

        $articles[$key] = $value;
		}

        return $articles;
    }


    public function view_article(){

        $id = isset($this->params['id']) ? abs(intval($this->params['id'])) : 0;
        $category_id = isset($this->params['category_id']) ? abs(intval($this->params['category_id'])) : 0;
        $this->Session->write('category_id',$category_id);
        $article = $this->Article->getArticleById($id,1);

        $opening_day = Configure::read("OPENING_DAY");
        $articleDescription = preg_replace($this->pattern,$this->replacement,$article['Article']['description']);

        $article['Article']['description'] = $articleDescription;

        $this->Session->write('alias1',$this->params['alias1']);
        $this->Session->write('alias2',$this->params['alias2']);
        $this->Session->write('id',$this->params['id']);
        $this->Session->write('page',$this->params['page']);
        $title_for_layout = $article['Article']['title'];

        /*Thế Anh- Get other article cùng category*/
        $label_id = $this->Label->find('first',array('conditions'=>array('slug'=>$this->params['alias1'])));

        $this->Article->bindModel(array(
            'hasOne'=>array(
                'ArticleLabel'
            )
        ));


        if($label_id['Label']['id'] == 9){
        	$label_id['Label']['id'] = 13;
        }

        $other_article = $this->Article->find('all',array('conditions'=>"ArticleLabel.label_id = ".$label_id['Label']['id']." and `Article.is_published` = 1 AND Article.alias NOT LIKE '%".$article['Article']['alias']."%'", 'fields'=>array('Article.id','title','thumbnail','alias','description','short_description')));

        foreach($other_article as $key => $value){
            $other_article[$key]['Article']['description'] = preg_replace($this->pattern,$this->replacement,$value['Article']['description']);

        }

        $this->set(compact('article','title_for_layout','other_article'));

        $this->render();
    }

    public function cungchuyenmuc(){
		$page =  $this->Session->read('page');
        $arrayArticleId = $this->Session->read('arrayArticleId');
        //debug($arrayArticleId);
        //$orther = $this->Article->getArticleByArrayId($arrayArticleId);
        $this->paginate=array(
            'conditions'=>array(
                'Article.id' => $arrayArticleId
            ),
            'order'=>'Article.sort DESC',
            'limit'=>10,
			'page'=>$page
        );


        $orther = $this->paginate('Article');
        $this->set(compact('orther'));
        $this->render();
    }
}
?>
