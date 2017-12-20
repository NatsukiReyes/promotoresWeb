package Models;

import CoreFiles.CoreModel;
import java.sql.ResultSet;

/**
 *
 * @author Hugo Hernández
 */
public class UsuarioModel extends CoreModel {

  public UsuarioModel() {
    this.table_name = "usuario";
    this.pri_index = "cod_usuario";
  }

  public ResultSet checkCredentials(String email, String pass) {
    String queryString = "select\n"
      + "u.id_usuario,\n"
      + "concat(u.nombre,' ', u.app, ' ' ,u.apm) as nombre,\n"
      + "u.email,\n"
      + "tu.nombre as tipo_usuario,\n"
      + "tu.id_tipo_usuario\n"
      + "from\n"
      + "usuario u\n"
      + "join tipo_usuario tu\n"
      + "on u.tipo_usuario = tu.id_tipo_usuario\n"
      + "where u.status = 1\n"
      + "and u.email = '" + email + "'\n"
      + "and u.pass = '" + securePassword(pass, "cm17") + "'";
    return this.db.execQuery(queryString);
  }
}
