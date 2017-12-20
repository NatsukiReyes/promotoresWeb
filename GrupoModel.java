package Models;

import CoreFiles.CoreModel;
import java.sql.ResultSet;
import java.util.HashMap;
import java.util.Map;

/**
 *
 * @author hugo
 */
public class GrupoModel extends CoreModel {

  public GrupoModel() {
    this.pri_index = "id_grupo";
    this.table_name = "grupo";
  }

  public ResultSet getActive(int idGrupo) {
    Map<String, Object> where = new HashMap();
    if (idGrupo != 0) {
      where.put(pri_index, idGrupo);
    }
    where.put("status", 1);
    return this.get(where, null, null, null);
  }
}
