import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { ProdutoComponent } from './cruds/produto/produto.component';
import { HttpClientModule } from '@angular/common/http';
import { GerenteComponent } from './gerente/gerente.component';

import { GerenteSidebarComponent } from './gerente/gerente-sidebar/gerente-sidebar.component';
import { FormsModule } from '@angular/forms';
import { LandingPageComponent } from './landing-page/landing-page.component';
import { ForgotPassComponent } from './login/forgot-pass/forgot-pass.component';
import { FuncionarioMenuComponent } from './funcionario/funcionario-menu.component';
import { FuncionarioSidebarComponent } from './funcionario/funcionario-sidebar/funcionario-sidebar.component';
import { FuncionarioHeaderComponent } from './funcionario/funcionario-header/funcionario-header.component';
import { FuncionarioCalendarioComponent } from './funcionario/atividades/funcionario-calendario/funcionario-calendario.component';
import { FuncionarioServicesComponent } from './funcionario/atividades/funcionario-services/funcionario-services.component';
import { FuncionarioClientesComponent } from './funcionario/gestao/funcionario-clientes/funcionario-clientes.component';
import { FuncionarioRelatoriosComponent } from './funcionario/gestao/funcionario-relatorios/funcionario-relatorios.component';
import { FuncionarioProdutoComponent } from './funcionario/portifolio/funcionario-produto/funcionario-produto.component';
import { FuncionarioCatalogoComponent } from './funcionario/portifolio/funcionario-catalogo/funcionario-catalogo.component';
import { FuncionarioPedidosComponent } from './funcionario/portifolio/funcionario-pedidos/funcionario-pedidos.component';
import { FuncionarioAtendimentoComponent } from './funcionario/gestao/funcionario-atendimento/funcionario-atendimento.component';
import { ClienteInfoComponent } from './funcionario/gestao/funcionario-clientes/cliente-info/cliente-info.component';
import { ClienteCrudComponent } from './cruds/cliente/cliente-crud.component';
import { ClienteComponent } from './cliente/cliente.component'
import { AluguelComponent } from './cruds/aluguel/aluguel.component';
import { EstoqueComponent } from './cruds/estoque/estoque.component';
import { PontoComponent } from './cruds/ponto/ponto.component';
import { PortifolioComponent } from './cruds/portifolio/portifolio.component';
import { ServicoComponent } from './cruds/servico/servico.component';
import { VendaComponent } from './cruds/venda/venda.component';
import { FuncionarioComponent } from './cruds/funcionario/funcionario.component';
import { HeaderComponent } from './header/header.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { MatToolbarModule,
        MatIconModule,
        MatCardModule,
        MatButtonModule,
        MatProgressBarModule } from '@angular/material';
import { ModalComponent } from './modal/modal.component';
import { NgbActiveModal, NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { Globals } from './globals';
import { ImageModalComponent } from './modal/image-modal/image-modal.component';
import { UploadImgBtnComponent } from './image/upload-btn/upload-img-btn.component';
import { ProdutoClientViewComponent } from './cliente/produto-client-view/produto-client-view.component';
import { ProdutoDetailComponent } from './cliente/produto-client-view/produto-detail/produto-detail.component';
import { NewAccountComponent } from './login/new-account/new-account.component';
import { CartProductsComponent } from './cliente/cart-products/cart-products.component';
import { CheckOutComponent } from './cliente/check-out/check-out.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    ProdutoComponent,
    GerenteComponent,
    GerenteSidebarComponent,
    LandingPageComponent,
    ForgotPassComponent,
    FuncionarioMenuComponent,
    FuncionarioSidebarComponent,
    FuncionarioHeaderComponent,
    HeaderComponent,
    FuncionarioCalendarioComponent,
    FuncionarioServicesComponent,
    FuncionarioClientesComponent,
    FuncionarioRelatoriosComponent,
    FuncionarioProdutoComponent,
    FuncionarioCatalogoComponent,
    FuncionarioPedidosComponent,
    FuncionarioAtendimentoComponent,
    ClienteInfoComponent,
    ClienteCrudComponent,
    ClienteComponent,
    AluguelComponent,
    EstoqueComponent,
    PontoComponent,
    PortifolioComponent,
    ServicoComponent,
    VendaComponent,
    FuncionarioComponent,
    ModalComponent,
    ImageModalComponent,
    UploadImgBtnComponent,
    ProdutoClientViewComponent,
    ProdutoDetailComponent,
    NewAccountComponent,
    CartProductsComponent,
    CheckOutComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    BrowserAnimationsModule,
    MatToolbarModule,
    MatIconModule,
    MatCardModule,
    MatButtonModule,
    MatProgressBarModule,
    NgbModule.forRoot()
  ],
  providers: [
    NgbActiveModal,
    Globals
  ],
  entryComponents: [
      ModalComponent,
      ImageModalComponent
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
