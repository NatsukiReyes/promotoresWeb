package Models;

import CoreFiles.CoreModel;
import java.sql.ResultSet;
import java.util.HashMap;
import java.util.Map;

/**
 *
 * @author hugo
 */
public class FamiliaModel extends CoreModel {

  public FamiliaModel() {
    this.pri_index = "id_familia";
    this.table_name = "familia";
  }

  public ResultSet getActive(int idFamilia) {
    Map<String, Object> where = new HashMap();
    if (idFamilia != 0) {
      where.put(pri_index, idFamilia);
    }
    where.put("status", 1);
    return this.get(where, null, null, null);
  }
}
