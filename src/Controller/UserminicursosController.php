<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
/**
 * Userminicursos Controller
 *
 * @property \App\Model\Table\UserminicursosTable $Userminicursos
 */
class UserminicursosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Minicursos']
        ];
        $this->set('userminicursos', $this->paginate($this->Userminicursos));
        $this->set('_serialize', ['userminicursos']);
    }

    /**
     * View method
     *
     * @param string|null $id Userminicurso id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userminicurso = $this->Userminicursos->get($id, [
            'contain' => ['Users', 'Minicursos']
        ]);
        $this->set('userminicurso', $userminicurso);
        $this->set('_serialize', ['userminicurso']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userminicurso = $this->Userminicursos->newEntity();
        if ($this->request->is('post')) {
            $userminicurso = $this->Userminicursos->patchEntity($userminicurso, $this->request->data);
            if ($this->Userminicursos->save($userminicurso)) {
                $this->Flash->success(__('The userminicurso has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The userminicurso could not be saved. Please, try again.'));
            }
        }
        $users = $this->Userminicursos->Users->find('list', ['limit' => 200]);
        $minicursos = $this->Userminicursos->Minicursos->find('list', ['limit' => 200]);
        $this->set(compact('userminicurso', 'users', 'minicursos'));
        $this->set('_serialize', ['userminicurso']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Userminicurso id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userminicurso = $this->Userminicursos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userminicurso = $this->Userminicursos->patchEntity($userminicurso, $this->request->data);
            if ($this->Userminicursos->save($userminicurso)) {
                $this->Flash->success(__('The userminicurso has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The userminicurso could not be saved. Please, try again.'));
            }
        }
        $users = $this->Userminicursos->Users->find('list', ['limit' => 200]);
        $minicursos = $this->Userminicursos->Minicursos->find('list', ['limit' => 200]);
        $this->set(compact('userminicurso', 'users', 'minicursos'));
        $this->set('_serialize', ['userminicurso']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Userminicurso id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($userid = null, $minicurso = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $primaryKeyArray = array('user_id'=>$userid,'minicurso_id'=>$minicurso);
        $userminicurso = $this->Userminicursos->get($primaryKeyArray);
        if ($this->Userminicursos->delete($userminicurso)) {
            $this->Flash->success(__('Participanten desmatriculado'));
        } else {
            $this->Flash->error(__('Ocorreu algum erro, atualize a tela e tente novamente!'));
        }
        return $this->redirect($this->referer());
    }
    
    public function exportMinicursosCertificado()
    {
    	
    	$connection = ConnectionManager::get('default');
    	$userminicursos = $connection->execute('SELECT userminicursos.user_id, users.nome, minicursos.titulo FROM userminicursos INNER JOIN users on userminicursos.user_id = users.id INNER JOIN minicursos on userminicursos.minicurso_id = minicursos.id')->fetchAll('assoc');

    
    	$_serialize = 'userminicursos';
    	$_csvEncoding = 'Windows-1252';
    	$_delimiter = ';';
    	$_header = ['Nº Inscrição', 'NOME','TÍTULO MINICURSO	'];
    	$this->response->download('participantes_minicursos.csv'); // <= setting the file name
    	$this->viewBuilder()->className('CsvView.Csv');
    	$this->set(compact('userminicursos', '_serialize','_header','_csvEncoding','_delimiter'));
    }
    
    public function isAuthorized($user)
    {
    		
    
    	if (	$this->request->action === 'view'
    			||	$this->request->action === 'index'
    			||	$this->request->action === 'add'
    			||	$this->request->action === 'delete') {
    				if (strpos('admin supervisor', $user['role']) !== false){
    					return true;
    				}
    			}
    			return parent::isAuthorized($user);
    }
    
}