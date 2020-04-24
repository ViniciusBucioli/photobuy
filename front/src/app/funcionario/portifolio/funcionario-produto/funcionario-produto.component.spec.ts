import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FuncionarioProdutoComponent } from './funcionario-produto.component';

describe('FuncionarioProdutoComponent', () => {
  let component: FuncionarioProdutoComponent;
  let fixture: ComponentFixture<FuncionarioProdutoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FuncionarioProdutoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FuncionarioProdutoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
