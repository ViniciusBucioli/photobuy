import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FuncionarioServicesComponent } from './funcionario-services.component';

describe('FuncionarioServicesComponent', () => {
  let component: FuncionarioServicesComponent;
  let fixture: ComponentFixture<FuncionarioServicesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FuncionarioServicesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FuncionarioServicesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
