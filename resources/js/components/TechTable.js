import React, { Component } from "react";
import BootstrapTable from "react-bootstrap-table-next";
import "bootstrap/dist/css/bootstrap.min.css";
import "react-bootstrap-table-next/dist/react-bootstrap-table2.min.css";
import filterFactory, { selectFilter, numberFilter, Comparator, textFilter } from "react-bootstrap-table2-filter";
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import tecnologias from './bd/tecnologias.js';
import Table from 'react-bootstrap/Table'
import Form from 'react-bootstrap/Form'
import { FormattedMessage, injectIntl, intlShape } from 'react-intl';
import paginationFactory from 'react-bootstrap-table2-paginator';

class TechTable extends Component {
  constructor(props) {
    super(props);
    this.state = {
      filters: {}
    };
    this.experienciaFilter = 1;
    this.tipoFilter = "";
    this.nombreFilter = "";
  }

  onTableChange = (type, newState) => {
    this.setState({
      filters: newState.filters
    });
  };

  resetFilters = () => {
    this.experienciaFilter("");
    this.tipoFilter("");
  };
  filterExperience = (e) => {
    this.experienciaFilter({ number: +e.target.value, comparator: Comparator.GE });
  }
  filterTipo = (e) => {
    this.tipoFilter(e.target.value);
  }
  filterNombre = (e) => {
    this.nombreFilter(e.target.value);
  }

  render() {
    const selectOptions = {
      Frontend: "Frontend",
      Backend: "Backend",
      Varios: "Varios"
    };

    const products = () => {
      const { filters } = this.state;
      let items = tecnologias;



      const experienciaFilter = filters.experiencia ? filters.experiencia.filterVal : null;
      const tipoFilter = filters.tipo ? filters.tipo.filterVal : null;

      if (experienciaFilter) {
        items = items.filter(item => item.experiencia === experienciaFilter);
      }

      if (tipoFilter) {
        items = items.filter(item => item.tipo === tipoFilter);
      }

      return items;
    };

    const tf_experience = this.props.intl.formatMessage({ id: 'skills.table.experience' })
    const tf_area = this.props.intl.formatMessage({ id: 'skills.table.area' })
    const tf_tech = this.props.intl.formatMessage({ id: 'skills.table.tech' })


    const columns = [

      {
        dataField: "name",
        text: tf_tech,
        filter: textFilter({
          className: "hidden",
          getFilter: filter => {
            this.nombreFilter = filter;
          },
        }),
      },
      {
        dataField: "experiencia",
        text: tf_experience,
        filter: numberFilter({
          comparators: [Comparator.GE],
          options: [1, 2, 3, 4, 5],
          placeholder: tf_experience,
          withoutEmptyComparatorOption: true,
          defaultValue: 1,
          comparator: Comparator.GE,
          comparatorClassName: "hidden",
          defaultValue: { number: 1, comparator: Comparator.GE },
          className: "hidden",
          getFilter: filter => {
            this.experienciaFilter = filter;
          },
          sort: true
        })

      },
      {
        dataField: "tipo",
        text: tf_area,
        filter: selectFilter({
          className: "hidden",
          options: selectOptions,
          getFilter: filter => {
            this.tipoFilter = filter;
          },
        }),
        sort: true,
      }
    ];
    const c_exp = this.props.intl.formatMessage({ id: 'skills.filterExperience.c' })
  
    return (
      <div>
        <p>Filtrar por</p>
        <Row>
          <Col lg={8}>
        <Table className="w-100">
          <tbody>
          <tr>
            <td >
              <FormattedMessage id="skills.filterExperience" />
            </td>
            <td>
              <Form.Select onChange={this.filterExperience}>
                <option value='1'>{c_exp} 1</option>
                <option value='2'>{c_exp} 2</option>
                <option value='3'>{c_exp} 3</option>
                <option value='4'>{c_exp} 4</option>
                <option value='5'>{c_exp} 5</option>
              </Form.Select>
            </td>
          </tr>
          <tr>
            <td >
              <FormattedMessage id="skills.filterArea" />
            </td>
            <td>
              <Form.Select onChange={this.filterTipo}>
                <option value='Backend'>Backend</option>
                <option value='Frontend'>Frontend</option>
                <option value='Varios'>Varios</option>
              </Form.Select>
            </td>
          </tr>
          <tr>
            <td >
              <FormattedMessage id="skills.filterName" />
            </td>
            <td>
              <Form.Control type="text" onChange={this.filterNombre}>

              </Form.Control>
            </td>
          </tr>
          </tbody>

        </Table>
          </Col>
          <Col md={4}>
          </Col>
          
        </Row>


        <BootstrapTable
          keyField="id"
          data={products()}
          columns={columns}
          // remote={{ filter: true }}
          onTableChange={this.onTableChange}
          filter={filterFactory()}
          sort={{ dataField: 'experiencia', order: 'desc' }}
          pagination={paginationFactory()}

        />
      </div>
    );
  }
}

export default injectIntl(TechTable);