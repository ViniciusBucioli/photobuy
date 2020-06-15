import { IUser } from './user-interface';
import { UserType } from '../../enums/user-type.enum';

export class ClienteModel implements IUser {
    public id: number;
    public userType: UserType;
    public password: string;
    public nome: string;
    public email: string;
    public name: string;
    public tel: string;
    public endereco: string;
}