<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class UsersController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['register', 'login']);
        $this->viewBuilder()->setLayout('layout');
    }

    public function register()
    {
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success('Registration successfully....');
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error('Unable to register.');
        }

        $this->set(compact('user'));
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $identity = $this->Authentication->getIdentity();
            $role = $identity->get('role'); // Assuming 'role' is stored in the identity

            // Define redirection based on role using if-else
            if ($role === 'Admin') {
                $redirect = ['controller' => 'Admindashboard', 'action' => 'index'];
            } else {
                $redirect = ['controller' => 'Userdashboard', 'action' => 'index'];
            }
            return $this->redirect($redirect);
        }

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password.');
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();

        // regardless of POST or GET, redirect to login
        if ($result && $result->isValid()) {
            $this->Authentication->logout();

            // Clear all session data
            $session = $this->request->getSession();
            $session->destroy();

            $this->Flash->success('You have been Logged out successfully....');
        } else {
            $this->Flash->error('You are not in Login.');
        }
        // Redirect to Login Page
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    public function view()
    {
        $role = $this->request->getQuery('role'); // Get the role from query parameters
        
        $query = $this->Users->find();
        
        if (in_array($role, ['admin', 'user'])) {
            $query->where(['role' => $role]);
        } else {
            $query->where(['role IN' => ['admin', 'user']]); // fallback to both roles
        }
        
        $users = $this->paginate($query, [
            'limit' => 10,
            'order' => ['id' => 'ASC']
        ]);
        
        $this->set(compact('users', 'role'));
    }


    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been Added Successfully....');

                return $this->redirect(['action' => 'view']);
            }
            //$this->Flash->error('Please Enter Manitory Field.');
        }
        $this->set(compact('user'));
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('The User has been Edited Successfully.....');

                return $this->redirect(['action' => 'view']);
            }
            //$this->Flash->error('Please Enter Manitory Field.');
        }
        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The User has been deleted Successfully.....');
        } else {
            $this->Flash->error('The User could not be deleted. Please, try again.');
        }

        return $this->redirect(['action' => 'view']);
    }
}

