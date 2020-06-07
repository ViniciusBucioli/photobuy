import { UserType } from "../../enums/user-type.enum";

export interface IUser {
    id: number;
    userName: string;
    userType: UserType;
    password: string;
}
