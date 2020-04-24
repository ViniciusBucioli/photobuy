import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FuncionarioRelatoriosComponent } from './funcionario-relatorios.component';

describe('FuncionarioRelatoriosComponent', () => {
  let component: FuncionarioRelatoriosComponent;
  let fixture: ComponentFixture<FuncionarioRelatoriosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FuncionarioRelatoriosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FuncionarioRelatoriosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
