package Models;

import CoreFiles.CoreModel;
import java.sql.ResultSet;

/**
 *
 * @author hugo
 */
public class LaboratorioModel extends CoreModel {

  public LaboratorioModel() {
    this.pri_index = "id_catalogo_laboratorio";
    this.table_name = "catalogo_laboratorio";
  }

  public ResultSet getLaboratorio(int idLaboratorio) {
    String queryString = "select\n"
      + "cl.id_catalogo_laboratorio,\n"
      + "cl.nombre_laboratorio,\n"
      + "p.nombre\n"
      + "from\n"
      + "catalogo_laboratorio cl join proveedor p on\n"
      + "p.id_proveedor = cl.id_proveedor \n";
    if (idLaboratorio != 0) {
      queryString += "where cl." + this.pri_index + " = " + idLaboratorio + "\n";
    }
    queryString += "order by cl." + this.pri_index + " desc";
    return this.db.execQuery(queryString);
  }

}
