import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FuncionarioClientesComponent } from './funcionario-clientes.component';

describe('FuncionarioClientesComponent', () => {
  let component: FuncionarioClientesComponent;
  let fixture: ComponentFixture<FuncionarioClientesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FuncionarioClientesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FuncionarioClientesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
