import React, { Component } from "react";
import BootstrapTable from "react-bootstrap-table-next";
import "bootstrap/dist/css/bootstrap.min.css";
import "react-bootstrap-table-next/dist/react-bootstrap-table2.min.css";
import filterFactory, { selectFilter, numberFilter, Comparator, textFilter } from "react-bootstrap-table2-filter";
import tecnologias from './tecnologias.js';
import Table from 'react-bootstrap/Table'
import Form from 'react-bootstrap/Form'
import { FormattedMessage } from 'react-intl';
import paginationFactory from 'react-bootstrap-table2-paginator';

export default class TechTable extends Component {
  constructor(props) {
    super(props);
    this.state = {
      filters: {}
    };
    this.experienciaFilter = { number: 1, comparator: Comparator.GE };
    this.tipoFilter = "";
    this.nombreFilter = "";
  }

  onTableChange = (type, newState) => {
    this.setState({
      filters: newState.filters
    });
  };


  filterExperience = (e) => {
    console.log(+e.target.value);
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
      console.log("d=>", filters);
      let items = tecnologias;



      const experienciaFilter = filters.experiencia ? filters.experiencia.filterVal : { number: 1, comparator: Comparator.GE };
      const tipoFilter = filters.tipo ? filters.tipo.filterVal : null;

      if (experienciaFilter) {
        items = items.filter(item => item.experiencia === experienciaFilter);
      }

      if (tipoFilter) {
        items = items.filter(item => item.tipo === tipoFilter);
      }

      return items;
    };



    const columns = [

      {
        dataField: "name",
        text: "Tecnologia",
        filter: textFilter({
          className: "hidden",
          getFilter: filter => {
            this.nombreFilter = filter;
          },
        }),
      },
      {
        dataField: "experiencia",
        text: "Experiencia (años)",
        filter: numberFilter({
          comparators: [Comparator.GE],
          options: [1, 2, 3, 4, 5],
          placeholder: "años de experiencia",
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
        text: "Área de aplicación",
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

    return (
      <div>
        <p>Filtrar por</p>
        <Table className="w-50">
          <tbody>
          <tr>
            <td >
              <FormattedMessage id="skills.filterExperience" />
            </td>
            <td>
              <Form.Select onChange={this.filterExperience}>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
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