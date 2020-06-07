import { IUser } from './user-interface';
import { UserType } from '../../enums/user-type.enum';

export class ClienteModel implements IUser {
    public id: number;
    public userName;
    public userType: UserType;
    public password: string;
    public CPF: number;
    public nome: string;
    public email: string;
    public telefone: number;
    public endereco: string;
}