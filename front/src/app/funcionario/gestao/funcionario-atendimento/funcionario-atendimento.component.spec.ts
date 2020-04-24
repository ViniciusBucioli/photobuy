import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FuncionarioAtendimentoComponent } from './funcionario-atendimento.component';

describe('FuncionarioAtendimentoComponent', () => {
  let component: FuncionarioAtendimentoComponent;
  let fixture: ComponentFixture<FuncionarioAtendimentoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FuncionarioAtendimentoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FuncionarioAtendimentoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
