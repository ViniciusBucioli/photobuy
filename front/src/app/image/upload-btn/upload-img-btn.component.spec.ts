import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { UploadImgBtnComponent } from './upload-img-btn.component';

describe('UploadImgBtnComponent', () => {
  let component: UploadImgBtnComponent;
  let fixture: ComponentFixture<UploadImgBtnComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UploadImgBtnComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UploadImgBtnComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
