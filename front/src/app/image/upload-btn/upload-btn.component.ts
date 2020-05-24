import { Component, OnInit, Input, Output } from '@angular/core';
import { EventEmitter } from 'protractor';

@Component({
  selector: 'app-img-upload-btn',
  templateUrl: './upload-btn.component.html',
  styleUrls: ['./upload-btn.component.css']
})
export class UploadBtnComponent implements OnInit {

    @Input() img: File;
    @Output() ImgSelect = new EventEmitter();
    constructor() { }

    ngOnInit() {
    }

}
