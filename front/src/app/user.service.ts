import { Injectable } from '@angular/core';
import { IUser } from './cruds/models/user-interface';
import { PhpService } from './php.service';
import { UserType } from './enums/user-type.enum';

@Injectable({
  providedIn: 'root'
})
export class UserService {

    constructor(
        private service: PhpService
    ) { }

    public login(user: IUser) {
        // throw new exception('noe implemented');
        // return this.service.get('http://localhost:5500/controller', user);
    }

    public newUser(user: IUser) {
        if (user.userType === UserType.client) {
            return this.service.post('http://localhost:5500/controller/cliente/ClienteControllerCadastro.php', user);
        }
    }
}
