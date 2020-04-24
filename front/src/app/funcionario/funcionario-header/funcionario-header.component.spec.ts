import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FuncionarioHeaderComponent } from './funcionario-header.component';

describe('FuncionarioHeaderComponent', () => {
  let component: FuncionarioHeaderComponent;
  let fixture: ComponentFixture<FuncionarioHeaderComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FuncionarioHeaderComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FuncionarioHeaderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
