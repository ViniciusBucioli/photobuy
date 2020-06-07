import { Injectable } from '@angular/core';
import { IUser } from './cruds/models/user-interface';
import { PhpService } from './php.service';

@Injectable({
  providedIn: 'root'
})
export class UserService {

    constructor(
        private service: PhpService
    ) { }

    public login(user: IUser) {
        return this.service.post('http://localhost:5500/controller', user);
    }
}
