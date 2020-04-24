import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FuncionarioPedidosComponent } from './funcionario-pedidos.component';

describe('FuncionarioPedidosComponent', () => {
  let component: FuncionarioPedidosComponent;
  let fixture: ComponentFixture<FuncionarioPedidosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FuncionarioPedidosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FuncionarioPedidosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
