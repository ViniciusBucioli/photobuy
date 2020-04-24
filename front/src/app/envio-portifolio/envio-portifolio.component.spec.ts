import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EnvioPortifolioComponent } from './envio-portifolio.component';

describe('EnvioPortifolioComponent', () => {
  let component: EnvioPortifolioComponent;
  let fixture: ComponentFixture<EnvioPortifolioComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EnvioPortifolioComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EnvioPortifolioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
