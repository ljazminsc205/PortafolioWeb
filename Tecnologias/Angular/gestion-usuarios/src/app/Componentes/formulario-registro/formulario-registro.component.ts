import { Component, OnInit } from '@angular/core';
import {UserServiceService} from '../../servicios/user-service.service';
import {Usuario} from '../../usuarios.model';
import { Usuario } from 'src/app/usuarios.models';

@Component({
  selector: 'app-formulario-registro',
  templateUrl: './formulario-registro.component.html',
  styleUrls: ['./formulario-registro.component.css']
})
export class FormularioRegistroComponent implements OnInit {

  usuario: Usuario;
  constructor(private userService: UserServiceService) { }

  ngOnInit() {
    this.usuario = this.userService.nuevoUsuario();
  }
  nuevoUsuario(): void{
    this.userService.agregarUsuarios(this.usuario);
    this.usuario = this.userService.nuevoUsuario();
  }

}
