package Models;

import CoreFiles.CoreModel;
import java.sql.ResultSet;

/**
 *
 * @author hugo
 */
public class ProveedorModel extends CoreModel {

  public ProveedorModel() {
    this.pri_index = "id_proveedor";
    this.table_name = "proveedor";
  }

  public ResultSet getProveedor(int idProveedor) {
    String queryString = "select\n"
      + "p.id_proveedor,\n"
      + "p.rfc,\n"
      + "p.nombre,\n"
      + "concat(p.calle, ' ', cast(p.numero as text), ', ', p.colonia) as direccion,\n"
      + "tp.nombre tipo_proveedor\n"
      + "from\n"
      + "proveedor p join tipo_proveedor tp on\n"
      + "tp.id_tipo_proveedor = p.id_tipo_proveedor\n";
    if (idProveedor > 0) {
      queryString += "where p.id_proveedor = " + idProveedor + "\n";
    }
    queryString += "order by p.id_proveedor desc";
    return this.db.execQuery(queryString);
  }
}
