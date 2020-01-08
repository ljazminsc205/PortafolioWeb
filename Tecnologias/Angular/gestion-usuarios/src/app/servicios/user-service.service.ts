import { Injectable } from '@angular/core';
import {Usuario} from '..usuarios.model';

@Injectable({
  providedIn: 'root'
})
export class UserServiceService {

  private usuarios: Usuario[];
  constructor() {
    this.usuarios = [];
  }
  getUsuarios(){
    return this.usuarios;
  }
  agregarUsuarios(user:Usuario){
    this.usuarios.push(user);
  }
  nuevoUsuario(): Usuario {
    return{
      nombre:'',
      apellidos:'',
      cedula:'',
      correo:'',
      telefono:'',
      edad:''
    };
  }
}
