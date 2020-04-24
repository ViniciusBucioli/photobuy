import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FuncionarioCatalogoComponent } from './funcionario-catalogo.component';

describe('FuncionarioCatalogoComponent', () => {
  let component: FuncionarioCatalogoComponent;
  let fixture: ComponentFixture<FuncionarioCatalogoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FuncionarioCatalogoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FuncionarioCatalogoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
