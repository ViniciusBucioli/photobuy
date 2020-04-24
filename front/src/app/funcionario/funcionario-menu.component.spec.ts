import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FuncionarioMenuComponent } from './funcionario-menu.component';

describe('FuncionarioMenuComponent', () => {
  let component: FuncionarioMenuComponent;
  let fixture: ComponentFixture<FuncionarioMenuComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FuncionarioMenuComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FuncionarioMenuComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
