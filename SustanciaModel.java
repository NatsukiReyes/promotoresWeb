package Models;

import CoreFiles.CoreModel;
import java.sql.ResultSet;
import java.util.HashMap;
import java.util.Map;

/**
 *
 * @author hugo
 */
public class SustanciaModel extends CoreModel {

  public SustanciaModel() {
    this.pri_index = "id_sustancia_activa";
    this.table_name = "catalogo_sustancia_activa";
  }

  public ResultSet getActive(int idSustancia) {
    Map<String, Object> where = new HashMap();
    if (idSustancia != 0) {
      where.put(pri_index, idSustancia);
    }
    where.put("status", 1);
    return this.get(where, null, null, null);
  }
}
