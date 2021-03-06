import { Component, OnInit, ViewChild, ElementRef } from '@angular/core';
import { FormGroup, FormControl } from '@angular/forms';
import { Router } from '@angular/router';
import { SessionStorageService } from '../../session-storage.service';
import { map, catchError } from 'rxjs/operators';
import { HttpEventType, HttpErrorResponse } from '@angular/common/http';
import { of } from 'rxjs';
import { UserService } from '../../user.service';
import { UserType } from '../../enums/user-type.enum';
import { IUser } from '../../cruds/models/user-interface';
import { ClienteModel } from '../../cruds/models/cliente-model.model';
import { NotificationService } from '../../notification.service';

@Component({
  selector: 'app-new-account',
  templateUrl: './new-account.component.html',
  styleUrls: ['./new-account.component.sass']
})
export class NewAccountComponent implements OnInit {
    @ViewChild('fileUpload') fileUpload: ElementRef;
    private perfilImage: any;
    private imageOk = false;
    private userType: UserType = UserType.client;
    public user: IUser;

    constructor(
        private userService: UserService,
        private router: Router,
        private sessionStorage: SessionStorageService,
        private notification: NotificationService
    ) { }

    ngOnInit() {
        this.user = new ClienteModel();
        this.user.userType = UserType.client;
    }

    public onSubmit() {
        const sucess = () => {
            this.router.navigateByUrl('/login');
            this.notification.addNotification({message: 'Usuário criado, faça login.', onRouter: '/login' });
        };
        this.userService.newUser(this.user).subscribe(sucess);
        
    }

    public fileUploadClick() {
            const fileUpload = this.fileUpload.nativeElement;
            fileUpload.onchange = (e: any) => {
                for (let index = 0; index < fileUpload.files.length; index++) {
                    const file = fileUpload.files[index];
                    this.perfilImage = { data: file, inProgress: false, progress: 0};
                }
              this.uploadFiles();  
            };
            fileUpload.click();
        }
    private uploadFiles() {
        this.fileUpload.nativeElement.value = '';
        this.uploadFile(this.perfilImage);
    }
    uploadFile(file) {
        const formData = new FormData();
        formData.append('file', file.data);
        file.inProgress = true;
        // this.userService.sendImage(formData).subscribe(
        //     (e: any) => {
        //         //this.usuario.fotoUsuario = e.body.path;
        //         this.imageOk = true;
        //     }
        // );
        
        /*.pipe(
            map(event => {
                switch (event.type) {
                    case HttpEventType.UploadProgress:
                    file.progress = Math.round(event.loaded * 100 / event.total);
                    break;
                    case HttpEventType.Response:
                    return event;
                }
            }),
            catchError((error: HttpErrorResponse) => {
                file.inProgress = false;
                return of(`${file.data.name} upload failed.`);
            })).subscribe((event: any) => {
                if (typeof (event) === 'object') {
                    console.log(event.body);
                }
            });
            */
      }
}
