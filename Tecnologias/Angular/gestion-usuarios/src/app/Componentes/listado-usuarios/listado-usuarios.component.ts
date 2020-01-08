import { Component, OnInit } from '@angular/core';
import {UserServiceService} from '../../servicios/user-service.service';
import {Usuario} from '../../usuarios.model';

@Component({
  selector: 'app-listado-usuarios',
  templateUrl: './listado-usuarios.component.html',
  styleUrls: ['./listado-usuarios.component.css']
})

export class ListadoUsuariosComponent implements OnInit {
  usuarios: Usuario[];
  constructor(private userService: UserServiceService) { }
  ngOnInit() {
  this.usuarios = this.userService.getUsuarios();
  }
  }
