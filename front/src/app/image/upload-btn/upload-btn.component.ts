import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-img-upload-btn',
  templateUrl: './upload-btn.component.html',
  styleUrls: ['./upload-btn.component.css']
})
export class UploadBtnComponent implements OnInit {

    public img: File;
    @Output() imgSelect = new EventEmitter();
    constructor() { }

    ngOnInit() {
    }

    public handleFileInput(files: any) {
        this.img = files.item(0);
        this.imgSelect.emit(this.img);
    }

}
