import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';

class Monopoly extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      nazwa: '',
      cena: '',
      domki: '',
    }
  }
  render() {
    return (
      <div class="container">
        <h1>Monopoly</h1>
        <Formularz
          onChange={(key, value) => {
            let newState = {};
            newState[key] = value;
            this.setState(newState);
          }}
        />
        <Karta
          nazwa={this.state.nazwa}
          cena={this.state.cena}
          iloscDomkow={this.state.domki}
        />
      </div>
    );
  }
}


function Karta({ nazwa, cena, iloscDomkow }) {
  return (

    <div class="container m-5">
      <div class="card text-center">
        <div class="card-header">
          Nazwa: {nazwa}
        </div>
        <div class="card-body">
          <h5 class="card-title">cena: {cena}</h5>
        </div>
        {(() => {
          if (iloscDomkow > 0) {
            return (<div class="card-body">
              <h5 class="card-title">iloscDomkow: {iloscDomkow}</h5>
              {domki(iloscDomkow)}
            </div>)
          }
        })()}
      </div>
    </div>
  );
}

function domki(iloscDomkow) {
  let domki = [];
  for (let i = 0; i < iloscDomkow; i++) {
    domki.push(
      // house icon
      (<i class="fa fa-home" aria-hidden="true"></i>)
    );
  }
  return domki;
}

function Formularz({ onChange }) {
  // state variable hook
  const [typ, setTyp] = React.useState('');

  return (
    <div class="container">
      <h1>Formularz</h1>
      <form>
        {/* <Pole
          nazwaPola={'typ'}
          onChange={(key, value) => {
            if (value === 'nieruchomosc') {
              setTyp('nieruchomosc');
            }
            else if (value === 'lotnisko') {
              setTyp('lotnisko');
            }
            onChange(key, value);
          }}
        /> */}
        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" onChange={(e) => {
            setTyp(e.target.value);
            onChange('typ' ,e.target.value);
            console.log(typ);
          }}>
            <option value="lotnisko">lotnisko</option>
          <option value="nieruchomosc">nieruchomosc</option>          
          <option value="media">media</option>
        </select>

        <Pole
          nazwaPola={'nazwa'}
          onChange={onChange}
        />
        <Pole
          nazwaPola={'cena'}
          onChange={onChange}
        />
        {
          (() => {
            if (typ === 'nieruchomosc') {
              return (
                <Pole
                  nazwaPola={'domki'}
                  onChange={onChange}
                />
              );
            }
          })()
        }



        {/* <button type="submit" class="btn btn-primary">Submit</button> */}
      </form>
    </div>

  );
}

function Pole({ nazwaPola, onChange }) {
  return (
    <div class="mb-3">
      <label for="" class="form-label">{nazwaPola}</label>
      <input type="text" class="form-control" id="nazwaPola" onChange={(event) => { onChange(nazwaPola, event.target.value) }} />
    </div>
  );
}



// ========================================

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(<Monopoly />);
