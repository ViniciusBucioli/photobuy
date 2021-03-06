import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AppComponent } from './app.component';
import { ProdutoComponent } from './cruds/produto/produto.component';
import { GerenteComponent } from './gerente/gerente.component';
import { LandingPageComponent } from './landing-page/landing-page.component';
import { LoginComponent } from './login/login.component';
import { FuncionarioMenuComponent } from './funcionario/funcionario-menu.component';
import { FuncionarioCalendarioComponent } from './funcionario/atividades/funcionario-calendario/funcionario-calendario.component';
import { FuncionarioServicesComponent } from './funcionario/atividades/funcionario-services/funcionario-services.component';
import { FuncionarioAtendimentoComponent } from './funcionario/gestao/funcionario-atendimento/funcionario-atendimento.component';
import { FuncionarioClientesComponent } from './funcionario/gestao/funcionario-clientes/funcionario-clientes.component';
import { FuncionarioRelatoriosComponent } from './funcionario/gestao/funcionario-relatorios/funcionario-relatorios.component';
import { FuncionarioCatalogoComponent } from './funcionario/portifolio/funcionario-catalogo/funcionario-catalogo.component';
import { FuncionarioPedidosComponent } from './funcionario/portifolio/funcionario-pedidos/funcionario-pedidos.component';
import { FuncionarioProdutoComponent } from './funcionario/portifolio/funcionario-produto/funcionario-produto.component';
import { ClienteComponent } from './cliente/cliente.component';
import { ProdutoDetailComponent } from './cliente/produto-client-view/produto-detail/produto-detail.component';
import { NewAccountComponent } from './login/new-account/new-account.component';
import { CheckOutComponent } from './cliente/check-out/check-out.component';

const routes: Routes = [
    {
        path: '',
        component: LandingPageComponent
    },
    {
        path: 'gerente',
        component: GerenteComponent
    },
    {
        path: 'cliente',
        children: [{
            path: '',
            component: ClienteComponent
        },
        {
            path: 'product',
            children: [{
                path: ':id',
                component: ProdutoDetailComponent
            }]
        },
        {
            path: 'checkout',
            component: CheckOutComponent
        }
    ]
    },
    {
        path: 'funcionario',
        children: [{
            path: '',
            component: FuncionarioMenuComponent,
        },
        {
            path: 'atividades',
            children: [
            {
                path: 'calendario',
                component: FuncionarioCalendarioComponent
            },
            {
                path: 'servicos',
                component: FuncionarioServicesComponent
            }]
        },
        {
            path:'gestao',
            children: [
            {
                path: 'atendimento',
                component: FuncionarioAtendimentoComponent
            },
            {
                path: 'clientes',
                component: FuncionarioClientesComponent
            },
            {
                path: 'relatorios',
                component: FuncionarioRelatoriosComponent
            }]
        },
        {
            path:'portifolio',
            children: [
            {
                path: 'catalogo',
                component: FuncionarioCatalogoComponent
            },
            {
                path: 'pedidos',
                component: FuncionarioPedidosComponent
            },
            {
                path: 'relatorios',
                component: FuncionarioProdutoComponent
            }]
        }]
    },
    {
        path: 'login',
        component: LoginComponent
    },
    {
        path: 'new-account',
        component: NewAccountComponent
    }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
