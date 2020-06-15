import { UserType } from "../../enums/user-type.enum";

export interface IUser {
    id: number;
    name: string;
    userType: UserType;
    password: string;
    email: string;
    tel: string;
    endereco: string;
}
