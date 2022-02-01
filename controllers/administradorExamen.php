<?php


class AdministradorExamen extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            $this->view->render('administradorExamen/index');
        }

        function renderEditar(){
            $this->view->render('administradorExamen/editar');
        }

        function renderDashboardInicio(){
            $this->view->render('administradorExamen/dashboardinicio');
        }

        function renderDashboardFormulario(){
            $this->view->render('administradorExamen/dashboardformulario');
        }

    }
?>