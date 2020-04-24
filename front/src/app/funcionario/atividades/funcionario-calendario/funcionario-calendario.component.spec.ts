import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FuncionarioCalendarioComponent } from './funcionario-calendario.component';

describe('FuncionarioCalendarioComponent', () => {
  let component: FuncionarioCalendarioComponent;
  let fixture: ComponentFixture<FuncionarioCalendarioComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FuncionarioCalendarioComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FuncionarioCalendarioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
