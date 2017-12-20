package Models;

import CoreFiles.CoreModel;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.logging.Level;
import java.util.logging.Logger;
import net.sf.jasperreports.engine.JRException;
import net.sf.jasperreports.engine.JasperCompileManager;
import net.sf.jasperreports.engine.JasperReport;
import net.sf.jasperreports.engine.JasperRunManager;
import net.sf.jasperreports.engine.design.JasperDesign;
import net.sf.jasperreports.engine.xml.JRXmlLoader;

/**
 *
 * @author hugo
 */
public class MedicamentoModel extends CoreModel {

  public MedicamentoModel() {
    this.pri_index = "id_medicamento";
    this.table_name = "medicamento";
  }

  /**
   * Crea una Estructura para obtener medicamentos
   *
   * @return String una estructura de query
   */
  private String _getMedicamentos() {
    return "select\n"
      + "m.id_medicamento,\n"
      + "m.nombre,\n"
      + "m.contenido,\n"
      + "m.precio,\n"
      + "m.codigo_barra,\n"
      + "lb.nombre_laboratorio,\n"
      + "fm.nombre_familia,\n"
      + "g.nombre_grupo,\n"
      + "st.cantidad_maxima,\n"
      + "st.cantidad_minima,\n"
      + "st.cantidad,\n"
      + "concat( '<ul><li>', string_agg( distinct csa.descripcion_sustancia, '</li><li>' ), '</li></ul>' ) as sustancias\n"
      + "from\n"
      + "medicamento m join catalogo_laboratorio lb on\n"
      + "m.id_laboratorio = lb.id_catalogo_laboratorio join grupo g on\n"
      + "g.id_grupo = m.id_grupo join familia fm on\n"
      + "fm.id_familia = m.id_familia join stock st on\n"
      + "st.id_producto = m.id_medicamento join sustancia_activa_medicamento sam on\n"
      + "sam.id_medicamento = m.id_medicamento join catalogo_sustancia_activa csa on\n"
      + "csa.id_sustancia_activa = sam.id_sustancia_activa\n"
      + "where\n"
      + "m.status = 1\n"
      + "and st.id_tipo_producto = 1\n";
  }

  private String _getMedicamento() {
    return "select\n"
      + "m.id_medicamento,\n"
      + "m.nombre,\n"
      + "m.contenido,\n"
      + "m.precio,\n"
      + "m.codigo_barra,\n"
      + "lb.id_catalogo_laboratorio,\n"
      + "g.id_grupo,\n"
      + "fm.id_familia,\n"
      + "st.id_stock,\n"
      + "st.cantidad_maxima,\n"
      + "st.cantidad_minima,\n"
      + "string_agg( distinct cast(csa.id_sustancia_activa as text), ',' ) as sustancias,\n"
      + "g.nombre_grupo\n"
      + "from\n"
      + "medicamento m join catalogo_laboratorio lb on\n"
      + "m.id_laboratorio = lb.id_catalogo_laboratorio join grupo g on\n"
      + "g.id_grupo = m.id_grupo join familia fm on\n"
      + "fm.id_familia = m.id_familia join stock st on\n"
      + "st.id_producto = m.id_medicamento join sustancia_activa_medicamento sam on\n"
      + "sam.id_medicamento = m.id_medicamento join catalogo_sustancia_activa csa on\n"
      + "csa.id_sustancia_activa = sam.id_sustancia_activa\n"
      + "where\n"
      + "m.status = 1\n"
      + "and st.id_tipo_producto = 1\n";
  }

  /**
   * Obtiene todos los medicamentos
   *
   * @return ResulSet de todos los medicamentos
   */
  public ResultSet getMedicamentos() {
    String queryString = this._getMedicamentos();
    queryString += "group by\n"
      + "m.id_medicamento,\n"
      + "g.id_grupo,\n"
      + "lb.id_catalogo_laboratorio,\n"
      + "fm.id_familia,\n"
      + "st.id_stock\n"
      + "order by\n"
      + "m.id_medicamento desc";
    return this.db.execQuery(queryString);
  }

  /**
   * Obtiene los medicamentos por medio de filtros
   *
   * @param params
   * @return ResultSet El resultado de todos los fitros
   */
  public ResultSet getMedicamentosBy(String... params) {
    String queryString = this._getMedicamentos();
    // Nombre del medicamento
    if (!params[0].equals("")) {
      queryString += "and lower(m.nombre) like '%" + params[0].toLowerCase() + "%' \n";
    }
    // Contenido
    if (!params[1].equals("")) {
      queryString += "and lower(m.contenido) like '%" + params[1].toLowerCase() + "%' \n";
    }
    // Precio
    if (!params[2].equals("") && !params[3].equals("")) {
      queryString += "and m.precio between " + params[2] + " and " + params[3] + "\n";
    }
    // Codigo de barras
    if (!params[4].equals("")) {
      queryString += "and m.codigo_barra = " + params[4] + " \n";
    }
    // Laboratorio
    if (!params[5].equals("")) {
      queryString += "and m.id_laboratorio = " + params[5] + " \n";
    }
    // Familia
    if (!params[6].equals("")) {
      queryString += "and m.id_familia = " + params[6] + " \n";
    }
    // Grupo
    if (!params[7].equals("")) {
      queryString += "and m.id_grupo = " + params[7] + "\n";
    }
    // Sustancia
    if (!params[8].equals("")) {
      queryString += "and sam.id_sustancia_activa = " + params[8] + "\n";
    }
    queryString += "group by\n"
      + "m.id_medicamento,\n"
      + "g.id_grupo,\n"
      + "lb.id_catalogo_laboratorio,\n"
      + "fm.id_familia,\n"
      + "st.id_stock\n"
      + "order by\n"
      + "m.id_medicamento desc";
    return this.db.execQuery(queryString);
  }

  /**
   * Obtiene la información de un solo medicamento para asi facilitar su edición
   *
   * @param idMedicamento
   * @return ResultSet de un medicamento en especifico
   */
  public ResultSet getMedicamento(int idMedicamento) {
    String queryString = this._getMedicamento();
    if (idMedicamento != 0) {
      queryString += "and m.id_medicamento = " + idMedicamento + "\n";
    }
    queryString += "group by\n"
      + "m.id_medicamento,\n"
      + "g.id_grupo,\n"
      + "lb.id_catalogo_laboratorio,\n"
      + "fm.id_familia,\n"
      + "st.id_stock\n"
      + "order by\n"
      + "m.id_medicamento desc";
    return this.db.execQuery(queryString);
  }

  /**
   * Agrega, edita o elimina Sustancias de un medicamento
   *
   * @param sustancias
   * @param idMedicamento
   * @param edit
   */
  public void medicamentoSustancia(String[] sustancias, int idMedicamento, boolean edit) {
    List<Map<String, Object>> inserts = new ArrayList();
    Map<String, Object> individual;
    if (edit) {
      deleteMedicamentoSustancia(idMedicamento);
    }
    for (String sustancia : sustancias) {
      individual = new HashMap();
      individual.put("id_medicamento", idMedicamento);
      individual.put("id_sustancia_activa", Integer.parseInt(sustancia));
      inserts.add(individual);
    }
    this.db.insertBatch("sustancia_activa_medicamento", inserts);
  }

  public void deleteMedicamentoSustancia(int idMedicamento) {
    this.db.delete("sustancia_activa_medicamento", "id_medicamento = " + idMedicamento);
  }

  /**
   * Funcion del modelo para construir el reporte
   *
   * @param path
   * @return array de bytes un pdf transformado en bytes
   */
  public byte[] makeReport(String path) {
    byte[] byteStream = null;
    try {
      JasperReport jasperReport;
      JasperDesign jasperDesign;
      // El reporte tiene un parametro llamado nombre, se lo pasamos por medio de un map
      Map parameters = new HashMap();
      parameters.put("nombre", "");
      // Carga el reporte y lo compila
      jasperDesign = JRXmlLoader.load(path + "medicamento.jrxml");
      jasperReport = JasperCompileManager.compileReport(jasperDesign);
      // Abre una conexión con la db, Transforma reporte en bytes
      byteStream = JasperRunManager.runReportToPdf(jasperReport, parameters, this.db.getConnection());
      // Cierra la conexión con la db
      this.db.closeConection();
    } catch (JRException ex) {
      Logger.getLogger(MedicamentoModel.class.getName()).log(Level.SEVERE, null, ex);
    }
    return byteStream;
  }
}
